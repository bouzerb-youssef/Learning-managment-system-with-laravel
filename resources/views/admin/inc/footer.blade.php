<br><br><br><br><br>
<div class="footer">
            <div class="container">
                @php
                    use App\Models\footercontent;
                    $footercontent =footercontent::find(1);
                @endphp
                <div class="uk-grid-collapse uk-grid" uk-grid="">
                    <div class="uk-width-expand@s uk-first-column">
                        <p>© 2021<strong> {{$footercontent->title}}</strong> {{$footercontent->description}}</p>
                    </div>
                    <div class="uk-width-auto@s">
                        <nav class="footer-nav-icon">
                            <ul>
                                <li><a href="{{$footercontent->facebook}}"><i class="icon-brand-facebook"> </i></a></li>
                                <li><a href="{{$footercontent->instagram}}"><i class="icon-brand-instagram"></i></a></li>
                                <li><a href="{{$footercontent->youtube}}"><i class="icon-brand-youtube"></i></a></li>
                                <li><a href="{{$footercontent->twitter}}"><i class="icon-brand-twitter"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
</div>