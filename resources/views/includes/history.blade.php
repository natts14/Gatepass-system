<div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">LOGIN TIME</th>
                        <th scope="col">LOGIN DATE</th>
                        <th scope="col">LOGOUT TIME</th>
                        <th scope="col">LOGOUT DATE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parking_logs as $log)
                    <tr>
                        <td>{{ $log->login_time }}</td>
                        <td>{{ $log->login_date }}</td>
                        <td>{{ $log->logout_time }}</td>
                        <td>{{ $log->logout_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>