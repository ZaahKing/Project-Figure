<form id="subjectForm" action="{{route('subject.add')}}"  method="POST">
    @csrf
    <div class="form-group">
        <label>{{__('label.name')}}</label>
        <input name='name' class="form-control" type="text" placeholder="{{__('label.name')}}" value="{{request()->get('name')}}" autofocus>
    </div>
    <div class="form-group">
        <label>{{__('label.description')}}</label>
        <textarea name='description' class="form-control" placeholder="{{__('label.description')}}" rows='6'>{{request()->get('description')}}</textarea>   
    </div>
    <div class="form-group text-right">
        <input type="submit" value="{{__('label.add')}}" class="btn btn-primary">
    </div>
    <input type="hidden" name="url" value="{{request()->get('url')??url()->current()}}">
</form>