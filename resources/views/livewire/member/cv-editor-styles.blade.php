<style>
    /* 1. Common Styles (Applies to both Live Preview and Print) */
    #cv-preview {
        padding: 0 !important;
        background: white !important;
        overflow-x: hidden;
        min-height: 297mm; /* Full A4 height approximate for preview */
    }

    /* Standardized Padding for non-bleeding sections */
    #cv-preview > div {
        padding-left: 15mm !important;
        padding-right: 15mm !important;
        padding-top: 5mm !important;
        padding-bottom: 5mm !important;
    }

    /* THE FULL-BLEED HEADER (Common logic) */
    #cv-preview > div:first-child[style*="background-color"] {
        margin: 0 !important;
        padding: 20mm 15mm !important;
        width: 100% !important;
        min-height: 70mm !important;
        box-sizing: border-box !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
    }

    /* Spacing after header */
    #cv-preview > div:first-child[style*="background-color"] + div {
        margin-top: 5mm !important;
    }

    /* Ensure specific elements stay white on colored backgrounds */
    #cv-preview .text-white, 
    #cv-preview h2.text-white,
    #cv-preview div:first-child[style*="background-color"] * {
        color: #ffffff !important;
    }

    @media print {
        /* Hide everything except our CV */
        header, footer, nav, aside, .no-print, [class*="lg:w-1/2"]:first-child, 
        .fixed, .absolute:not(#cv-preview) { 
            display: none !important; 
            opacity: 0 !important;
            visibility: hidden !important;
            height: 0 !important;
            overflow: hidden !important;
        }
        
        body, html, .py-12, .container, [class*="lg:w-1/2"], .sticky, .cv-container-neutral { 
            margin: 0 !important; 
            padding: 0 !important; 
            height: auto !important;
            min-height: 0 !important;
            width: 100% !important;
            max-width: none !important;
            display: block !important;
            position: static !important; /* Force out of any layout context */
            background: white !important;
            box-shadow: none !important;
            border: none !important;
            transform: none !important;
        }

        #cv-preview {
            width: 100% !important; /* Allow full width flow */
            margin: 0 !important;
            padding: 0 !important;
            background: white !important;
            display: block !important;
            position: relative !important; /* Changed from absolute to relative for better flow */
            overflow: visible !important;  /* Ensure content doesn't get clipped */
            top: auto !important;
            left: auto !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* Prevent breaking inside items */
        #cv-preview .mb-4, 
        #cv-preview .mb-6,
        #cv-preview li {
            page-break-inside: avoid !important;
            break-inside: avoid !important;
        }

        /* Standard body text color for print */
        #cv-preview {
            color: #000000 !important;
        }

        /* Ensure header and white-text elements stay white */
        #cv-preview div:first-child[style*="background-color"],
        #cv-preview div:first-child[style*="background-color"] *,
        #cv-preview .text-white {
            color: #ffffff !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        #cv-preview h1, #cv-preview h2, #cv-preview h3 {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        @page {
            size: A4;
            margin: 0;
        }
    }
</style>
