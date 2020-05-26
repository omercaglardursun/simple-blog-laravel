<div class="col-md-3">
    <aside class="sidebar">

        <form>
            <div class="input-group input-group-lg">
                @if(Auth::check())
                    @if(Auth::user()->yetki>0)
                        <button class="btn btn-borders btn-success""><i class="fa fa-plus" aria-hidden="true"></i><a href="/admin/forum/ana-baslik-ekle">Yeni Başlık Ekle</a></button>
                    @endif
                @endif
                <button class="btn btn-borders btn-success"><i class="fa fa-plus" aria-hidden="true"></i> <a href="/forum/konu-ekle"> Yeni Konu Ekle</a></button>
            </div>
        </form>

        <hr>

        <h4 class="heading-primary">Categories</h4>
        <ul class="nav nav-list mb-xlg">
            @foreach($anabasliklar as $baslik)
            <li><a href="/forum/{{$baslik->slug}}">{{$baslik->baslik}}</a></li>
            @endforeach
        </ul>

        <div class="tabs mb-xlg">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i> Popular</a></li>
                <li><a href="#recentPosts" data-toggle="tab">Recent</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="popularPosts">
                    <ul class="simple-post-list">
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="blog-post.html">
                                        <img src="img/blog/blog-thumb-1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
                                <div class="post-meta">
                                    Jan 10, 2015
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="blog-post.html">
                                        <img src="img/blog/blog-thumb-2.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="blog-post.html">Vitae Nibh Un Odiosters</a>
                                <div class="post-meta">
                                    Jan 10, 2015
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="blog-post.html">
                                        <img src="img/blog/blog-thumb-3.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="blog-post.html">Odiosters Nullam Vitae</a>
                                <div class="post-meta">
                                    Jan 10, 2015
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="recentPosts">
                    <ul class="simple-post-list">
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="blog-post.html">
                                        <img src="img/blog/blog-thumb-2.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="blog-post.html">Vitae Nibh Un Odiosters</a>
                                <div class="post-meta">
                                    Jan 10, 2015
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="blog-post.html">
                                        <img src="img/blog/blog-thumb-3.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="blog-post.html">Odiosters Nullam Vitae</a>
                                <div class="post-meta">
                                    Jan 10, 2015
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="post-image">
                                <div class="img-thumbnail">
                                    <a href="blog-post.html">
                                        <img src="img/blog/blog-thumb-1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="post-info">
                                <a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
                                <div class="post-meta">
                                    Jan 10, 2015
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr>

        <h4 class="heading-primary">About Us</h4>
        <p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. </p>

    </aside>
</div>
