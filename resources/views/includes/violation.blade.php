        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                         <th scope="col">PLATE NUMBER</th>
                        <th scope="col">VIOLATION</th>
                        <th scope="col">DATE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($violation as $log)
                    <tr>
                        <td>{{ $log->violation_id }}</td>
                        <td>{{ $log->specification }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>