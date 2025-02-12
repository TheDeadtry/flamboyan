<button onclick="history.back()" class="btn btn-warning" style="margin-bottom: 10px;">Kembali</button>
<button onclick="exportToPDF()" class="btn btn-success" style="margin-bottom: 10px;">Export PDF</button>
<h3 style="margin: 0; font-size: 16px;">Data TKI</h3>
<div style="border: 1px solid #ff4444; border-radius: 4px; margin-bottom: 20px;">
    <div style="background-color: #17a2b8; color: white; padding: 10px;">
        <h5 class="text-center"><?= $nama ?></h5>
    </div>
    <div style="padding: 15px;background-color: white;">
        <div style="overflow-x: auto;">
            <table id="tki-table" style="width: 100%; border-collapse: collapse; font-size: 10pt;">
                <thead>
                    <tr>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: center; position: sticky; top: 0;" colspan="3">TKI</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: center; position: sticky; top: 0;" colspan="5">SUHAN</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: center; position: sticky; top: 0;" colspan="7">VISA PERMIT</th>
                    </tr>
                    <tr>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">PIENHAO</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">NAMA</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">TGL TERB</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">NO.</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">TGL TRM</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">TGL SIMPAN</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">STATUS</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">TGL KIRIM</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">KETERANGAN</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">NO.</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">TGL TRM</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">STATUS</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">TGL SIMPAN</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">TGL KIRIM</th>
                        <th style="font-size:10pt; border: 1px solid #ddd; padding: 8px; text-align: left; position: sticky; top: 0;">KETERANGAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datatki as $row): ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->id_biodata; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->nama; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->tglterbang; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->no_suhan; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->tglterima; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->tglsimpan; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->statsuhan; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->kirimsuhan; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->ketdoksuhan; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->novisa; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->tglterimadok; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->statusterima; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->simpanvisapermit; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->kirimvisapermit; ?></td>
                        <td style="font-size:10pt; border: 1px solid #ddd; padding: 8px;"><?php echo $row->ketdok; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div style="overflow:hidden; width: 0px; height: 0px;">
    <iframe id="pdfFrame"></iframe>
</div>

<script>
const element = document.getElementById('tki-table');
const pdfFrame = document.getElementById('pdfFrame');
const docFrame = pdfFrame.contentWindow.document;

pdfFrame.contentWindow.el = el;
docFrame.head.appendChild(Object.assign(docFrame.createElement('script'), {
    src: 'https://app.flamboyangemajasa.com/flamboyan/pdfpage/html2pdf.js?v=3',
    onload: function() {
        docFrame.body.appendChild(Object.assign(docFrame.createElement('script'), {
            text: `
                function generatePDF(element, options) {
                    console.log(element);
                    html2pdf().set(options).from(element).save();
                }
                window.htmng2pdf = html2pdf;
            `,
        }));
    }
}));console.log(docFrame);
function exportToPDF() {
    pdfFrame.contentWindow.generatePDF(element.outerHTML, {
        margin: 5,
        filename: 'Data_TKI.pdf',
        image: { type: 'jpeg', quality: 1 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape', fontSize: 10 }
    });
}
</script>