<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="overflow-hidden border border-gray-200 shadow sm:rounded-lg">
			<table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rol
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <form action="{{ route('usuarios.updateRole', $user->id) }}" method="POST"
                                class="flex items-center">
                                @csrf
                                @method('PUT')
                                <select name="rol" id="rol"
                                    class="block w-full text-gray-700 border border-gray-300 focus:outline-none focus:border-green-400 focus:ring focus:ring-green-400 mr-2">
                                    <option value="1" {{ $user->rol == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ $user->rol == 2 ? 'selected' : '' }}>Usuario</option>
                                    <option value="3" {{ $user->rol == 3 ? 'selected' : '' }}>Control Previo</option>
                                </select>
                                <button type="submit"
                                    class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:bg-green-700">Guardar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>