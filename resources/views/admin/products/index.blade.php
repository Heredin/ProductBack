@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.aside')
            <div class="col-md-8">
                <a class="btn btn-success" href="{{ route('products.create') }}">Nuevo</a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if (count($products))
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>

                            @foreach ($products as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->price }}</td>
                                    <td>{{ $p->stock }}</td>
                                    <td>
                                        <form action="{{ route('products.destroy', $p->id) }}" method="Post">
                                            <a class="btn btn-primary" href="{{ route('products.edit', $p->id) }}">Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @else
                    <p>No hay productos</p>
                @endif
            </div>
        </div>
    </div>
@endsection
