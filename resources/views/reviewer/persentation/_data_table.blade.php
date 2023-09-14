<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Persentation</th>
            <th scope="col">Full Paper</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><a href="{{ \Illuminate\Support\Facades\Storage::url($persentation->persentation) }}" target="_blank">Download Persentation</a></td>
            <td><a href="{{ \Illuminate\Support\Facades\Storage::url($persentation->paper) }}" target="_blank">Download Full Paper</a></td>
        </tr>
    </tbody>
</table>



