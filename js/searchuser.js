        $(document).ready(function() {

            $('input.nume').typeahead({
                name: 'nume',
                remote: 'mysql.php?query=%QUERY'

            });

     
            $('input.dosar').typeahead({
                name: 'dosar',
                remote: 'searchdosar.php?d=%QUERY'

            });

        });