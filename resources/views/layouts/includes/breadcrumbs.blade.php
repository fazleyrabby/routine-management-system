<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb bg-white p-3">
                        @php $segments = ''; @endphp
                        @foreach(Request::segments() as $segment)
                            @php
                                $slug = str_replace('_',' ',$segment);
                                $segments .= '/'.$segment; @endphp
                            <li>
                                <a href="{{ $segments }}">{{ ucfirst($slug) }}</a>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>

