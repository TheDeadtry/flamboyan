function initDataTable(config, tableId = '#dataTable', options = {}) {
    let currentPage = 1;
    let pageSize = options.pageSize || 10;
    let totalPages = 0;
    let searchTerm = '';
    let searchTimeout;
    let dataTableInstance;
    let statusFilter = '';
    
    const table = document.querySelector(tableId);
    
    // Add title above datatable
    if (config.title) {
        const titleDiv = document.createElement('h4');
        titleDiv.className = 'mb-3';
        titleDiv.textContent = config.title;
        table.parentNode.insertBefore(titleDiv, table);
    }

    // Add status filter with dynamic options from config.statusOptions
    const statusSelect = document.createElement('select');
    statusSelect.className = 'form-control mb-3';
    statusSelect.style.marginBottom = '10px';
    let statusOptions = '<option value="">Semua Status</option>';
    if (config.statusOptions && config.statusOptions.values) {
        statusOptions += config.statusOptions.values.map(value => 
            `<option value="${value}">${value}</option>`
        ).join('');
    }
    statusSelect.innerHTML = statusOptions;
    if (config.statusOptions && config.statusOptions.title) {
        const statusLabel = document.createElement('label');
        statusLabel.className = 'form-label';
        statusLabel.textContent = config.statusOptions.title;
        table.parentNode.insertBefore(statusLabel, table);
    }
    
    const searchInput = document.createElement('input');
    searchInput.setAttribute('type', 'text');
    searchInput.setAttribute('placeholder', 'Search...');
    searchInput.className = 'form-control mb-3';
    searchInput.style.marginBottom = '10px';
    
    const paginationDiv = document.createElement('div');
    paginationDiv.className = 'pagination justify-content-end mt-3';
    
    const loaderDiv = document.createElement('div');
    loaderDiv.className = 'text-center';
    loaderDiv.style.position = 'absolute';
    loaderDiv.style.top = '50%';
    loaderDiv.style.left = '50%';
    loaderDiv.style.transform = 'translate(-50%, -50%)';
    loaderDiv.style.zIndex = '1000';
    loaderDiv.style.display = 'none';
    loaderDiv.innerHTML = `
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="mt-2">Loading data...</div>
    `;
    
    table.parentNode.style.position = 'relative';
    table.parentNode.insertBefore(statusSelect, table);
    table.parentNode.insertBefore(searchInput, table);
    table.parentNode.insertBefore(loaderDiv, table);
    table.parentNode.insertBefore(paginationDiv, table.nextSibling);

    searchInput.addEventListener('input', function(e) {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            searchTerm = e.target.value;
            currentPage = 1;
            loadData();
        }, 800);
    });

    statusSelect.addEventListener('change', function(e) {
        statusFilter = e.target.value;
        currentPage = 1;
        loadData();
    });
    
    function buildTable(data) {
        const headers = config.view_label;
        let thead = '<thead><tr>';
        headers.forEach(header => {
            thead += `<th title="${header}">${header}</th>`;
        });
        thead += '</tr></thead>';
        
        let tbody = '<tbody>';
        if (!data || data.length === 0 || !data[0] || Object.keys(data[0]).length === 0) {
            tbody += `<tr><td colspan="${headers.length}" class="text-center">Tidak ada data tersedia</td></tr>`;
        } else {
            data.forEach(row => {
                tbody += '<tr>';
                config.view.forEach(header => {
                    tbody += `<td title="${row[header] || '-'}">${row[header] || '-'}</td>`;
                });
                tbody += '</tr>';
            });
        }
        tbody += '</tbody>';
        
        table.innerHTML = thead + tbody;
    }    
    function updatePagination(totalRecords) {
        totalPages = Math.ceil(totalRecords / pageSize);
        let paginationHtml = '';
        
        const createButton = (text, page, disabled) => {
            return `<button class="btn btn-sm btn-outline-secondary ${disabled ? 'disabled' : ''}" 
                ${disabled ? 'disabled' : ''} onclick="return false;">${text}</button>`;
        };
        
        const firstBtn = createButton('First', 1, currentPage === 1);
        const prevBtn = createButton('Previous', currentPage - 1, currentPage === 1);
        const nextBtn = createButton('Next', currentPage + 1, currentPage === totalPages);
        const lastBtn = createButton('Last', totalPages, currentPage === totalPages);
        
        paginationHtml = firstBtn + prevBtn + 
            `<span class="mx-2">Page ${currentPage} of ${totalPages}</span>` + 
            nextBtn + lastBtn;
        
        paginationDiv.innerHTML = paginationHtml;
        
        // Add event listeners after creating buttons
        const buttons = paginationDiv.querySelectorAll('button');
        buttons[0].addEventListener('click', () => dataTableInstance.goToPage(1));
        buttons[1].addEventListener('click', () => dataTableInstance.goToPage(currentPage - 1));
        buttons[2].addEventListener('click', () => dataTableInstance.goToPage(currentPage + 1));
        buttons[3].addEventListener('click', () => dataTableInstance.goToPage(totalPages));
    }
    
    function loadData() {
        loaderDiv.style.display = 'block';
        table.style.opacity = '0.5';
        paginationDiv.style.opacity = '0.5';
        
        let query = `SELECT ${config.view.join(', ')} FROM ${config.table}`;
        let countQuery = `SELECT COUNT(*) as total FROM ${config.table}`;
        let whereConditions = [];

        if (searchTerm) {
            const searchCondition = config.view
                .map(key => `LOWER(${key}) LIKE LOWER('%${searchTerm}%')`)
                .join(' OR ');
            whereConditions.push(`(${searchCondition})`);
        }

        if (statusFilter) {
            whereConditions.push(`${config.statusOptions.field} = '${statusFilter}' COLLATE utf8mb4_unicode_ci `);
        }

        if (whereConditions.length > 0) {
            const whereClause = whereConditions.join(' AND ');
            query += ` WHERE ${whereClause}`;
            countQuery += ` WHERE ${whereClause}`;
        }

        if (config.order && config.order.length > 0) {
            const orderClauses = config.order.map(([column, direction]) => `${column} ${direction}`);
            query += ` ORDER BY ${orderClauses.join(', ')}`;
        }
        
        query += ` LIMIT ${pageSize} OFFSET ${(currentPage - 1) * pageSize}`;
        console.log(query);        getDataTable(query).then(dataall => {
            let [data] = dataall;
            buildTable(data);
            getDataTable(countQuery).then(countDatas => {
                let [countData] = countDatas;
                if (countData && countData[0] && typeof countData[0].total !== 'undefined') {
                    updatePagination(countData[0].total);
                } else {
                    updatePagination(0);
                }
                loaderDiv.style.display = 'none';
                table.style.opacity = '1';
                paginationDiv.style.opacity = '1';
            });
        });    }
    
    const dataTableMethods = {
        goToPage: function(page) {
            currentPage = page;
            loadData();
        },
        refresh: function() {
            loadData();
        }
    };
    
    // Set dataTableInstance
    dataTableInstance = dataTableMethods;
    
    // Initial load
    loadData();
    
    return dataTableMethods;
}