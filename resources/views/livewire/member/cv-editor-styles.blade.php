<style>
    /* 1. Common Styles (Applies to both Live Preview and Print) */
    #cv-preview {
        padding: 0 0 15mm 0 !important; /* Add bottom padding */
        background: white !important;
        overflow-x: hidden;
        min-height: 297mm; /* Full A4 height approximate for preview */
    }
    
    /* Padding for template inner content */
    #cv-preview > div > div:last-child {
        padding-bottom: 10mm;
    }

    /* Responsive CV Preview Scaling */
    .cv-scale-wrapper {
        transform-origin: top center;
        display: flex;
        justify-content: center;
    }
    
    .cv-wrapper {
        overflow: hidden !important;
    }
    
    /* Mobile: Scale to 40% */
    @media (max-width: 639px) {
        .cv-scale-wrapper {
            transform: scale(0.4);
            height: 450px;
        }
        .cv-wrapper {
            height: 450px !important;
        }
    }
    
    /* Small tablet: Scale to 50% */
    @media (min-width: 640px) and (max-width: 767px) {
        .cv-scale-wrapper {
            transform: scale(0.5);
            height: 550px;
        }
        .cv-wrapper {
            height: 550px !important;
        }
    }
    
    /* Tablet: Scale to 55% */
    @media (min-width: 768px) and (max-width: 1023px) {
        .cv-scale-wrapper {
            transform: scale(0.55);
            height: 600px;
        }
        .cv-wrapper {
            height: 600px !important;
        }
    }
    
    /* Desktop: Scale to 70% */
    @media (min-width: 1024px) and (max-width: 1279px) {
        .cv-scale-wrapper {
            transform: scale(0.7);
            height: 750px;
        }
        .cv-wrapper {
            height: 750px !important;
        }
    }
    
    /* Large desktop: Scale to 85% */
    @media (min-width: 1280px) and (max-width: 1535px) {
        .cv-scale-wrapper {
            transform: scale(0.85);
            height: 950px;
        }
        .cv-wrapper {
            height: 950px !important;
        }
    }
    
    /* XL desktop: Full size */
    @media (min-width: 1536px) {
        .cv-scale-wrapper {
            transform: scale(1);
            height: auto;
        }
        .cv-wrapper {
            height: auto !important;
            min-height: 1100px;
        }
    }

    /* Standardized Padding for non-bleeding sections */
    /* Standardized Padding REMOVED - Templates handle their own padding now */
    #cv-preview > div {
        /* No padding here to prevent double margins with template internal padding */
    }

    /* THE FULL-BLEED HEADER (Common logic) */
    #cv-preview div[style*="background-color"] {
        margin: 0 !important;
        padding: 10mm 15mm !important; 
        width: 100% !important;
        min-height: 70mm !important;
        box-sizing: border-box !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
    }

    /* Spacing after header */
    #cv-preview div[style*="background-color"] + div {
        margin-top: 5mm !important;
    }

    /* Hide print spacers on screen */
    thead, tfoot {
        display: none;
    }

    /* Ensure specific elements stay white on colored backgrounds */
    #cv-preview .text-white, 
    #cv-preview h2.text-white,
    #cv-preview div[style*="background-color"] * {
        color: #ffffff !important;
    }

    @media print {
        /* Hide everything except our CV */
        header, footer, nav, aside, .no-print, [class*="lg:w-1/2"]:first-child, 
        .fixed, .absolute:not(#cv-preview), .cursor-pointer, button, label { 
            display: none !important; 
            opacity: 0 !important;
            visibility: hidden !important;
            height: 0 !important;
            overflow: hidden !important;
        }
        
        body, html, .py-12, .container, [class*="lg:w-1/2"], .sticky, .cv-container-neutral, .flex, .grid, .cv-wrapper, .cv-scale-wrapper { 
            margin: 0 !important; 
            padding: 0 !important; 
            height: auto !important;
            min-height: 0 !important;
            width: 100% !important;
            max-width: none !important;
            display: block !important;
            position: static !important;
            background: white !important;
            box-shadow: none !important;
            border: none !important;
            transform: none !important;
            border-radius: 0 !important;
            overflow: visible !important;
        }

        #cv-preview {
            width: 100% !important;
            max-width: none !important;
            min-height: auto !important;
            height: auto !important;
            margin: 0 !important;
            padding: 0 !important; /* Forces kill of inline padding-top/bottom */
            background: white !important;
            display: block !important;
            position: static !important;
            overflow: visible !important;
            box-shadow: none !important;
            border: none !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            box-sizing: border-box !important;
            transform: none !important;
        }

        /* The Print Spacer Trick - Standardized to 15mm */
        thead { display: table-header-group !important; visibility: visible !important; }
        tfoot { display: table-footer-group !important; visibility: visible !important; }
        
        table {
            border-collapse: separate !important;
            border-spacing: 0 !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            border: none !important;
            display: table !important; /* Force table display */
            table-layout: auto !important;
        }
        
        tbody { display: table-row-group !important; }
        tr { display: table-row !important; page-break-inside: auto !important; }
        td { display: table-cell !important; vertical-align: top !important; padding-left: 15mm !important; padding-right: 15mm !important; }
        
        .print-page-spacer {
            height: 15mm !important;
            min-height: 15mm !important;
            display: table-cell !important;
            padding: 0 !important;
            margin: 0 !important;
            overflow: hidden !important;
            line-height: 15mm !important;
            border: 1px solid transparent !important; /* Force browser to acknowledge the cell */
        }
        
        .print-page-spacer div {
            height: 15mm !important;
            min-height: 15mm !important;
            display: block !important;
            margin: 0 !important;
            padding: 0 !important;
            font-size: 1px !important;
            color: transparent !important;
        }

        /* HARD RESET ALL INTERNAL GAPS (Margins & Top/Side Padding) */
        #cv-preview div:not(.print-page-spacer div),
        #cv-preview section,
        #cv-preview article,
        #cv-preview table td div:not(.print-page-spacer div) {
            min-height: auto !important;
            height: auto !important;
            padding-top: 0 !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            margin-top: 0 !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
        
        /* Specific kill for inline styles */
        #cv-preview [style*="padding"],
        #cv-preview [style*="margin"] {
            padding-top: 0 !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            margin-top: 0 !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        /* Prevent breaking inside items */
        #cv-preview .mb-4, 
        #cv-preview .mb-6,
        #cv-preview li,
        #cv-preview [style*="margin-bottom"] {
            page-break-inside: avoid !important;
            break-inside: avoid !important;
        }
        
        /* Allow page breaks before sections if needed */
        #cv-preview h2 {
            page-break-after: avoid !important;
            break-after: avoid !important;
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
            margin: 0 !important; /* Hides browser headers/footers (date, title) */
        }
    }
</style>
