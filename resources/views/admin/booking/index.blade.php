<tbody>
@foreach ($bookings as $booking)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $booking->alat->nama_alat ?? '-' }}</td>
    <td>{{ $booking->tanggal_sewa }}</td>
    <td>{{ $booking->tanggal_pengembalian }}</td>

    <td>
        <a href="{{ route('booking.edit', $booking->id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('booking.destroy', $booking->id) }}"
              method="POST"
              style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin hapus data?')">
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
