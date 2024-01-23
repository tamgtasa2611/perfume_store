@vite(["resources/sass/app.scss", "resources/js/app.js"])
<x-layout>
    @include('layouts/nav')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
        </tr>
        </thead>
        <tr>
            <td>a</td>
            <td>b</td>
            <td>c</td>
        </tr>
        <tr>
            <td>
                <i class="bi bi-bag"></i>
            </td>
            <td>$</td>
            <td>@</td>
        </tr>
    </table>
    @include('layouts/footer')
</x-layout>
