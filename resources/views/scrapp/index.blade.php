<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrapper Form</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="Content">
        <div class="Content__scraperForm">
            <div class="container">
                <div class="Content__scraperForm--container">
                    <div class="Content__scraperForm--tabs">
                        <div class="Content__scraperForm--tabs-tab activeTab" tab="scraper">
                            <i class="fa-solid fa-clone"></i>
                            <span>Scrapear</span>
                        </div>
                        <div class="Content__scraperForm--tabs-tab" tab="exportarCSV">
                            <i class="fa-solid fa-file-export"></i>
                            <span>Exportar CSV</span>
                        </div>
                    </div>
                    <div class="Content__scraperForm--bodies">
                        <div class="Content__scraperForm--bodies-body scraper activeBody">
                            <form action="{{ route('scrapper') }}" method="POST">
                                @csrf
                                <div class="Content__scraperForm--inputContainer">
                                    <label for="provider">Proveedor</label>
                                    <select name="provider" id="provider">
                                        <option value="">Selecciona el proveedor</option>
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->name }}">{{ $provider->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="Content__scraperForm--inputContainer">
                                    <label for="type">Tipo</label>
                                    <select name="type" id="type">
                                        <option value="">Selecciona el tipo de Scrapp</option>
                                        <option value="search">Busqueda</option>
                                        <option value="categories">Categorias</option>
                                        <option value="links">Links</option>

                                    </select>
                                </div>
                                <div class="Content__scraperForm--inputContainer">
                                    <label for="search">Busqueda</label>
                                    <input name="search" id="search"
                                    placeholder="HP">
                                </div>
                                <div class="Content__scraperForm--inputContainer">
                                    <label for="categories">Categorias</label>
                                    <select name="categories" id="categories">
                                        <option value="">Selecciona la categoria</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="Content__scraperForm--inputContainer">
                                    <label for="links">Links</label>
                                    <textarea name="links" id="links" rows="6"
                                    placeholder="Ingresa tus URL como arreglo de textos [ 'href','href' ]"></textarea>
                                </div>

                                <div class="Content__scraperForm--sendButton">
                                    <button type="submit">Scrap</button>
                                </div>
                            </form>
                        </div>
                        <div class="Content__scraperForm--bodies-body exportarCSV">
                            <form action="{{ route('excel') }}" method="POST">
                                @csrf
                                <div class="Content__scraperForm--inputContainer">
                                    <label for="value">Exportar por Marca</label>
                                    <input type="text" name="value" id="value">
                                </div>
                                <div class="Content__scraperForm--sendButton">
                                    <button type="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
