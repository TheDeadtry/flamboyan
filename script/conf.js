let app_loc = location.href;
let [path, action, page] = app_loc.split("index.php/").pop().split('/');

let conf = {
    path: path,
    action: action,
    page: page
};

async function loadMultiImport(modules) {
    try {
        const imports = modules.map(module => 
            import(URL+`script/${module}.js?v=N-` + Date.now())
        );
        return await Promise.all(imports);
    } catch (error) {
        console.error('Error loading modules:', error);
        return [];
    }
}


;(async function (load_module) {
    let module = await import(`./${load_module.path}/${load_module.action}.js?v=N-` + Date.now());
    let app = new module.default();
    app.loadjs = loadMultiImport;
    console.log(app); app.run ? app.run() : null;
})(conf);