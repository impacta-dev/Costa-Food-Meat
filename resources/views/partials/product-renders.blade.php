<model-viewer class="renders__viewer" src="" ios-src="" preload auto-rotate camera-controls camera-orbit="" field-of-view="{{ $field ?? '20deg' }}" interaction-policy="allow-when-focused" ar>
    <div class="renders__poster" slot="poster">{{ $utils->content('loading') }}</div>
</model-viewer>
@if (isset($indicators))
<div class="renders__indicators">
    @foreach ($renders as $render)
    <a href="#" class="renders__indicator {{ $loop->first ? 'active' : '' }}" data-index="{{ $loop->index }}" style="width: {{ 100/count($renders) }}%"></a>
    @endforeach 
</div>
@endif
{{-- Scripts --}}
@section('js')
    @parent
    <script>
        let renders = null;
        let renderIndex = 0;

        $(function() {
            axios.get('/api/{{app()->getLocale()}}/product_renders')
            .then((resp) => {
                renders = resp.data;
                updateRender();
            })
            .catch(() => {
                console.log('Error al recuperar listado de categorías');
            });
        });

        $('.btn-prev').click(function() {
            renderIndex = (renderIndex == 0) ? renders.length-1 : renderIndex-1;
            updateRender();
            return false;
        });

        $('.btn-next').click(function() {
            renderIndex = (renderIndex+1 >= renders.length) ? 0 : renderIndex+1;
            updateRender();
            return false;
        });

        $('.renders__indicator').click(function() {
            renderIndex = $(this).data('index');
            updateRender();
            return false;
        });

        function updateRender() {
            const render = renders[renderIndex];
            $('.renders__indicator').removeClass('active');
            $('[data-index="' + renderIndex + '"]').addClass('active');
            $('.renders__name').text(render.name);
            $('.renders__viewer').attr('camera-orbit', render.camera_orbit + ' ');
            $('.renders__viewer').attr('src', '/img/products_3d/' + render.file + '.glb');
            $('.renders__viewer').attr('ios-src', '/img/products_3d/' + render.file + '.usdz');
        }
    </script>
@endsection