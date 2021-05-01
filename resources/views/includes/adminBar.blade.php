<div id="admin-bar">
    <div class="admin-bar">
        <nav>
            <ul>
                <li><a href="{{ route('admin') }}">admin</a></li>
                <li><a href="{{ route('admin.projects') }}">projects</a></li>
            </ul>
        </nav>
    </div>
    <script>
        window.onload = function () {
            $('#admin-bar').height($('.admin-bar').height())
        }
    </script>
</div>
