if(document.getElementById('texto')){
    window.addEventListener("load", function() {
        function busca(query = '') {
            $.ajax({
                url: "{{ route('/buscador') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    $('#ok').html(data);
                }
            })
        }

        $(document).on('keyup', '#texto', function() {
            var query = $(this).val();
            //console.log(query);
            busca(query);
        })

    })
}
