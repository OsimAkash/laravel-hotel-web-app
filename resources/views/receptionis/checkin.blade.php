@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="card-header">
            <h3 class="card-title">Check In Customer</h3>
        </div>
        <div class="card-body">

            <form action="{{ route('receptionis.checkin.post') }}" method="post">
                @csrf


                    <div class="form-group">
                        <label for="transaction_id">Transaction ID</label>
                        <input list="transactions" id="transaction_id" name="transaction_id" type="text" class="form-control @error('transaction_id') is-invalid @enderror" value="{{ old('transaction_id') }}" required autocomplete="off" autofocus/></label>
                        <datalist id="transactions">
                            @foreach ($transactions as $item)
                                <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                            @endforeach
                        </datalist>

                        @error('transaction_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right mt-2">
                        {{ __('Post') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Checked In Customer </h3>
        </div>
        <div class="card-body">
            <table id="transaction" class="display" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Customer Name</th>
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Number of Orders</th>
                        <th>Check in - Check out</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $item)
                        <tr class="text-center table-primary">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->roomNumber->number }}</td>
                            <td>{{ $item->room->roomType->name }}</td>
                            <td>{{ $item->many_room }}</td>
                            <td>{{ $item->check_in . ' - ' . $item->check_out}}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('receptionis.checkout', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Lakukan Checkout pada transaksi {{ $item->user->name }}?')">Check Out</a>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(function() {
        $("#transaction").DataTable({
            "responsive": true,
            "paging" : false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#facilityList_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
