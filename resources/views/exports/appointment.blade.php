<table>
    <thead>
        <tr>
            <th>Patient Id</th>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($appointments as $index => $appointment)
        <tr>
            <td>{{$appointment->patient_id}}</td>
            <td>{{ $appointment->doctor->user->name}}</td>
            <td>{{ $appointment->patient->name}}</td>
            <td>{{ Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
            <td>{{ Carbon\Carbon::parse($appointment->time)->format('h:i A') }}</td>
            <td>{{ $appointment->status }}</td>
           
        </tr>
        @empty
        <tr>
            <td colspan="7">
                <div>
                    No appointments found for today.
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>