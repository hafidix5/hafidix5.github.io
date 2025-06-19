<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Logs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Activity Logs</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Causer</th>
                    <th>Properties</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $log->description }}</td>
                        <td>{{ $log->causer?->name ?? 'N/A' }}</td>
                        <td>
                            IP: {{ $log->properties['ip'] ?? 'N/A' }}<br>
                            User Agent: {{ $log->properties['user_agent'] ?? 'N/A' }}
                        </td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No logs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $logs->links() }}
    </div>
</body>

</html>
