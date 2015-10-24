<script>

    $(function(){

        var
            $dropdowns = $('.dropdown-menu'),
            $make = $('#make_id'),
            $model = $('#model_id')
        ;

        $make.multiselect('destroy').multiselect({
                maxHeight: '300px',
                enableFiltering: true
        });

        $model.multiselect('destroy').multiselect({
                maxHeight: '300px',
                enableFiltering: true
        });

        $make.on('change', function(){
            $.ajax({
                url: location.origin + '/api/get-models-by-make?id='+$(this).val(),
                type: 'GET',
                success: function(response){
                    var options = '';

                    for(var i=0; i<response.length; i++){
                        options += '<option value="' + response[i].id + '">' + response[i].title + '</option>';
                    }

                    $model.html(options).multiselect('rebuild');
                },
                error: function(a,b,c){
                    console.log(a,b,c);
                }
            });
        });

    });

</script>