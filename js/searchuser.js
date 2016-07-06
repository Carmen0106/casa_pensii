        $(document).ready(function() {

            $('input.nume').typeahead({
                name: 'nume',
                remote: 'mysql.php?query=%QUERY'

            });

        });