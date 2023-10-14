<nav class="navbar navbar-expand-sm navbar-light bg-light px-4 py-1">
        <div class="">
            商品管理システム
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/home"><i class="bi bi-house"></i>ホーム</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home/list"><i class="bi bi-list"></i>商品一覧</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="/home/dsearch"><i class="bi bi-search"></i>詳細検索</a>
                </li> -->

            </ul>
        </div> 
        @auth
        @if (auth()->user()->role === 1)
        <div class="collapse navbar-collapse d-flex flex-column">
            <div class="small" style="font-size: 12px;">
                <span>▼管理者メニュー</span>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/item/index"><i class="bi bi-pen"></i>商品管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/list"><i class="bi bi-people-fill"></i>ユーザ管理</a>
                </li>
            </ul>
        </div>
        @endif
        @endauth
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/logout"><i class="bi bi-box-arrow-right"></i>ログアウト</a>
                </li>
            </ul>
        </div> 
    </nav>