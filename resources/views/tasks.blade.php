<div>
    <form action="{{ route('tasks.store')}}" method="post">
        {{ csrf_field() }}
        <label for="task">Nome da tarefa</label>
        <input type="text" name="task" id="task" placeholder="Tarefa" required/>
        <button type="submit">Adicionar</button>
    </form>
</div>
