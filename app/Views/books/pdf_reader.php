<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online PDF Reader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf_viewer.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #f0f0f0;
        }
        #pdf-container {
            width: 100%;
            height: calc(100% - 50px);
            overflow: auto;
        }
        canvas {
            display: block;
            margin: 0 auto;
        }
        #controls {
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 10px;
            background: #fff;
            border-top: 1px solid #ccc;
        }
        button {
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div id="pdf-container">
    <canvas id="pdf-canvas"></canvas>
</div>
<div id="controls">
    <button onclick="prevPage()">Previous</button>
    <button onclick="nextPage()">Next</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script>
    // Set the workerSrc property to use the PDF.js worker script from CDN
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

    const url = '<?= base_url('books/serve') ?>'; // URL to the servePdf controller method

    let pdfDoc = null;
    let pageNum = 1;
    let pageRendering = false;
    let pageNumPending = null;
    let scale = 1.5;
    let canvas = document.getElementById('pdf-canvas');
    let ctx = canvas.getContext('2d');

    // Render the page
    function renderPage(num) {
        pageRendering = true;
        pdfDoc.getPage(num).then(function(page) {
            const viewport = page.getViewport({ scale: scale });
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            const renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            const renderTask = page.render(renderContext);

            renderTask.promise.then(function() {
                pageRendering = false;
                if (pageNumPending !== null) {
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });
    }

    // Load the PDF
    pdfjsLib.getDocument(url).promise.then(function(pdf) {
        pdfDoc = pdf;
        renderPage(pageNum);
    });

    // Next page
    function nextPage() {
        if (pageNum < pdfDoc.numPages) {
            pageNum++;
            renderPage(pageNum);
        }
    }

    // Previous page
    function prevPage() {
        if (pageNum > 1) {
            pageNum--;
            renderPage(pageNum);
        }
    }
</script>

</body>
</html>
