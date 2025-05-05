<div id="v-products">
    <div class="container">
        <div class="row">
            {{-- Search input --}}
            <div class="col-space-left col-12 col-lg search">
                <p class="search__label">{!! $utils->content('search') !!}:</p>
                <div class="input-wrap">
                    <input
                    type="text"
                    placeholder="{!! $utils->content('search_placeholder', $page) !!}"
                    v-model="searchQuery"
                    @input="searchProducts">
                    <a href="javascript:void(0)" v-on:click.prevent="searchProducts"></a>
                </div>
            </div>
            {{-- Breadcrumbs --}}
            <div class="col breadcrumbs d-flex flex-column justify-content-between">
                <p class="breadcrumbs__breadcrumbs">
                    <span v-show="currentCategory">{!! $utils->content('main_category', $page) !!}</span>
                    <strong v-if="currentSection">&nbsp;&gt;&nbsp; @{{ currentCategory.name }}</strong>
                </p>
                <h2 v-show="currentItemTitle" class="breadcrumbs__category">@{{ currentItemTitle }}</h2>
                <h2 v-show="!currentItemTitle" class="breadcrumbs__category">{!! $utils->content("main_category", $page) !!}</h2>
            </div>
        </div>
    </div>
    {{-- Categories and sections --}}
    <div class="filters container">
        <div class="row">
            <div class="col-space-left col">
                <div class="row">
                    <div class="col-12 col-lg-1 mb-3 mb-lg-0 d-flex flex-column justify-content-center">
                        <a href="javascript:void(0)"
                            v-show="showSections"
                            v-on:click.prevent="selectAllCategories()"
                            class="filters__back">
                            <img src="/img/arrow-l.svg" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-12 col-lg-10 cat-sections-wrap">
                        {{-- Categories --}}
                        <transition name="categories">
                            <div v-show="showCategories" class="categories">
                                <a href="javascript:void(0)"
                                    class="categories__item"  
                                    v-for="category in categories" 
                                    v-bind:key="category.id" 
                                    v-on:click.prevent="selectCategory(category)">
                                    <img v-bind:src="'/img/product_categories/' + category.image" alt="">
                                    <span>@{{ category.name }}</span>
                                </a>
                            </div>
                        </transition>
                        {{-- Sections --}}
                        <transition name="sections">
                            <div v-show="showSections" class="sections">
                                <a href="javascript:void(0)"
                                    class="sections__item"
                                    v-bind:class="{ 'sections__item--selected': currentSection && currentSection.id == section.id }"
                                    v-bind:key="section.id" 
                                    v-for="section in sections" 
                                    v-on:click.prevent="selectSection(section)">
                                    <img v-bind:src="'/img/product_sections/' + section.image" alt="">
                                    <span>@{{ section.name }}</span>
                                </a>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Products --}}
    <div class="products container">
        <div class="row">
            <div class="col-space-left col">
                <div class="row">
                    <a v-bind:href="'{{ $utils->route_to_view('products') }}' + '/' + product.slug" 
                        v-for="product in products" 
                        v-bind:key="product.id" 
                        class="col-12 col-md-6 col-lg-4 col-xxl-3">
                        <div class="products__image">
                            <div v-bind:style="{ 'background-image': 'url(/img/products_sm/' + product.image + ')' }"></div>
                        </div>
                        <h2 class="products__name">@{{ product.name }}</h2>
                        <div class="products__link">{!! $utils->content('view', $page) !!}</div>
                    </a>
                    <div class="col text-center pb-5"
                        v-if="products.length == 0">
                        {{ $utils->content('no_results', $page) }}
                    </div>
                </div>
                {{-- Loading backdrop --}}
                <transition name="products__loading">
                    <div class="products__loading d-flex justify-content-center align-items-start" v-if="loadingProducts">
                        <div class="d-flex align-items-center">
                            <span></span> {!! $utils->content('loading') !!}
                        </div>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</div>
{{-- Scripts --}}
@section('js')
    @parent
    <script>
        const productsApp = new Vue({
            el: '#v-products',
            data: {
                loadingProducts: false,
                currentCategory: null,
                currentSection: null,
                showCategories: true,
                showSections: false,
                searchQuery: '',
                searchDebounce: null,
                categories: [],
                sections: [],
                products: []
            },
            mounted() {
                this.selectAllCategories();
            },
            computed: {
                currentItemTitle: function() {
                    return this.currentSection ? this.currentSection.name : (this.currentCategory ? this.currentCategory.name : null)
                }
            },
            methods: {
                selectCategory(category = null) {
                    this.currentCategory = category;
                    this.getSections();
                    this.getProducts();
                },
                selectAllCategories() {
                    this.currentCategory = null;
                    this.currentSection = null;
                    this.getProducts();
                    this.getCategories();
                },
                selectSection(section = null) {
                    this.currentSection = (this.currentSection && this.currentSection.id == section.id) ? null : section;
                    this.getProducts();
                },
                getCategories() {
                    axios.get('/api/{{app()->getLocale()}}/product_categories')
                    .then((resp) => {
                        var self = this;
                        self.showSections = false;
                        self.categories = resp.data;
    
                        setTimeout(function() {
                            self.showCategories = true;
                        }, 500);                            
                    })
                    .catch(() => {
                        console.log('Error al recuperar listado de categorías');
                    });
                },
                getSections() {
                    axios.get('/api/{{app()->getLocale()}}/product_sections', {
                        params: {
                            category_id: this.currentCategory ? this.currentCategory.id : ''
                        }
                    })
                    .then((resp) => {
                        var self = this;
                        self.showCategories = false;
                        this.sections = resp.data;
    
                        setTimeout(function() {
                            self.showSections = true;
                        }, 500);
                    })
                    .catch(() => {
                        console.log('Error al recuperar listado de secciones');
                    });
                },                
                getProducts() {
                    this.loadingProducts = true;
                    axios.get('/api/{{app()->getLocale()}}/products', {
                        params: {
                            category_id: this.currentCategory ? this.currentCategory.id : '',
                            section_id: this.currentSection ? this.currentSection.id : '',
                            search_query: this.searchQuery
                        }
                    })
                    .then((resp) => {
                        var self = this;
                        setTimeout(function() {
                            self.loadingProducts = false;
                            self.products = resp.data;
                        }, 500);
                    })
                    .catch(() => {
                        console.log('Error al recuperar listado de productos');
                    });
                },
                searchProducts(event) {
                    clearTimeout(this.searchDebounce);
                    this.searchDebounce = setTimeout(() => {
                        this.getProducts();
                    }, 600);
                }
            }
        });
    </script>    
@endsection