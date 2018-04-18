function MakePDF() {
        var pdf = new jsPDF('p', 'pt', 'a3');

        source = $('#users_table')[0];


        specialElementHandlers = {
            '#actions': function(element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };

        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, {// y coord

                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },
            function(dispose) {
                pdf.save('bde_users.pdf');
            }
            , margins);
    }