<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">商品管理システム</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/home">ホーム</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home/list">商品一覧</a>
                </li>
                @can('admin')
                <li class="nav-item">
                    <a class="nav-link" href="/user">ユーザー管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/item">商品管理</a>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="/logout">ログアウト</a>
                </li>
            </ul>
        </div>
    </nav>    