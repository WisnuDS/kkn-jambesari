@extends('front.layouts.main')
@section('content')
    <div class="container mt-5 pt-5">
        <div class="section-title" data-aos="fade-up">
            <h2>Profil Data RT/RW</h2>
          </div>
        <table class="table">
            <thead>
                <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>No RT/RW</th>
                <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @forelse ($data as $row)
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->position }}</td>
                    <td>{{ $row->association_number }}</td>
                    <td>{{ $row->address }}</td>
                @empty
                    <td colspan="4">belum ada data</td>
                @endforelse
                </tr>
            </tbody>
        </table>
    </div>
@endsection
