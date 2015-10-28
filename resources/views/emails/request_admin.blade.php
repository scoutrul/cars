<h3>Новый заказ</h3>

<p>
    Пользователь <strong>{{ $request->user->email }}</strong> оставил заказ:
</p>

<p>
    <strong>Тип:</strong> {{ $request->new ? 'новая' : '' }} {{ $request->old ? ', бу' : '' }} <br>
    <strong>Машина:</strong> {{ $request->type->title }} -> {{ $request->make->title }} -> {{ $request->model->title }} <br>
    <strong>Год выпуска:</strong> {{ $request->year }} <br>
    <strong>Сообщение:</strong> {{ $request->text }}
</p>
