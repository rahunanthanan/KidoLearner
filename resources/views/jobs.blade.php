

{{ HTML::style('scripts/vendor/jquery-ui/jquery-ui.min.css') }}


<a class="handle">Move</a>


@section('additional-scripts')
    {{ HTML::script('scripts/vendor/jquery-ui/jquery-ui.min.js') }}
    <script>
        $('table.db tbody').sortable({
            'containment': 'parent',
            'revert': true,
            helper: function(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index) {
                    $(this).width($originals.eq(index).width());
                });
                return $helper;
            },
            'handle': '.handle',
            update: function(event, ui) {
                $.post('{{ route('jobs-reposition') }}', $(this).sortable('serialize'), function(data) {
                    if(!data.success) {
                        alert('Whoops, something went wrong :/');
                    }
                }, 'json');
            }
        });
        $(window).resize(function() {
            $('table.db tr').css('min-width', $('table.db').width());
        });
    </script>
@endsection
