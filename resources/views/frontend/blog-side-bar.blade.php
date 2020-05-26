<div class="col-md-3">
    <aside class="sidebar">

        <form>
            <div class="input-group input-group-lg" >
                <input class="form-control" placeholder="Search..." name="s" id="s" type="text">
                <span class="input-group-btn">
											<button type="submit" disabled class="btn btn-primary btn-lg"><i
                                                    class="fa fa-search"></i></button>
										</span>
            </div>
        </form>

        <hr>

        <h4 class="heading-primary">Kategoriler</h4>
        <ul class="nav nav-list mb-xlg">
            @foreach($kategoriler as $kategori)
                <li><a href="/blog/{{$kategori->slug}}">{{$kategori->ad}}</a></li>
                @foreach($kategori->children as $alt_kategori)
                    <li><a href="/blog/{{$kategori->slug}}/{{$alt_kategori->slug}}">{{$alt_kategori->ad}}</a></li>
                    @foreach($alt_kategori->children as $alt_alt_kategori)
                        <li><a href="/blog/{{$kategori->slug}}/{{$alt_kategori->slug}}/{{$alt_alt_kategori->slug}}">{{$alt_alt_kategori->ad}}</a></li>
                    @endforeach
                @endforeach
            @endforeach
        </ul>
        <!-- <div class="tabs mb-xlg">
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
        </div> -->


        <hr>

        <h4 class="heading-primary">Hakkımızda</h4>
        <p>{{$hakkimizda->kisa_yazi}} </p>

    </aside>
</div>
