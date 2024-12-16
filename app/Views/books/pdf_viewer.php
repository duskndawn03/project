<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive PDF Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        #pdf-container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            border: 1px solid #ddd;
            position: relative;
            text-align: center;
        }
        #pdf-canvas {
            width: 100%;
            border: 1px solid #ccc;
        }
        #controls {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 10px 0;
        }
        #search-container {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        #search-result {
            margin-left: 10px;
            font-size: 0.9rem;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist/build/pdf.min.js"></script>
    <script>
        // Set the worker src for PDF.js
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdn.jsdelivr.net/npm/pdfjs-dist/build/pdf.worker.min.js';
    </script>
</head>
<body>
    <h1>PDF Viewer</h1>
    <div id="controls">
        <button id="prev-page">Previous Page</button>
        <button id="next-page">Next Page</button>
        <button id="zoom-in">Zoom In</button>
        <button id="zoom-out">Zoom Out</button>
        <div id="search-container">
            <input type="text" id="search-text" placeholder="Search text">
            <button id="search-btn">Search</button>
        </div>
        <span id="search-result"></span>
    </div>
    <div id="pdf-container">
        <canvas id="pdf-canvas"></canvas>
    </div>
    <script>
        // Set the PDF file URL dynamically with CI base_url
        const url = '<?= base_url('files/sample.pdf') ?>'; // CodeIgniter route-based solution for serving the PDF

        let pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 1.5,
            canvas = document.getElementById('pdf-canvas'),
            ctx = canvas.getContext('2d');

        // Load the PDF document
        pdfjsLib.getDocument(url).promise.then(pdf => {
            pdfDoc = pdf;
            renderPage(pageNum);
        });

        // Render the given page
        function renderPage(num) {
            pageRendering = true;
            pdfDoc.getPage(num).then(page => {
                const viewport = page.getViewport({ scale });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderContext = {
                    canvasContext: ctx,
                    viewport: viewport,
                };
                const renderTask = page.render(renderContext);

                renderTask.promise.then(() => {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });
        }

        // Go to the previous page
        document.getElementById('prev-page').addEventListener('click', () => {
            if (pageNum <= 1) return;
            pageNum--;
            renderPage(pageNum);
        });

        // Go to the next page
        document.getElementById('next-page').addEventListener('click', () => {
            if (pageNum >= pdfDoc.numPages) return;
            pageNum++;
            renderPage(pageNum);
        });

        // Zoom in
        document.getElementById('zoom-in').addEventListener('click', () => {
            scale += 0.2;
            renderPage(pageNum);
        });

        // Zoom out
        document.getElementById('zoom-out').addEventListener('click', () => {
            if (scale <= 0.5) return;
            scale -= 0.2;
            renderPage(pageNum);
        });

        // Search text within the PDF
        document.getElementById('search-btn').addEventListener('click', () => {
            const searchText = document.getElementById('search-text').value;
            if (!searchText) return;

            pdfDoc.getPage(pageNum).then(page => {
                page.getTextContent().then(textContent => {
                    const text = textContent.items.map(item => item.str).join(' ');
                    const matchIndex = text.indexOf(searchText);

                    const resultElement = document.getElementById('search-result');
                    if (matchIndex !== -1) {
                        resultElement.textContent = `Text found on this page.`;
                    } else {
                        resultElement.textContent = `Text not found on this page.`;
                    }
                });
            });
        });
    </script>
</body>
</html>
