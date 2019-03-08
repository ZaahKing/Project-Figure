<form id="setForm" action="{{route('deck.store')}}"  method="POST">   
    @csrf            
    <div class='form-group'>
        <label>{{__('Label.Title')}}</label>
        <input name='name' class="form-control" type="text" placeholder="{{__('Label.Title')}}" value="{{old('name')}}">
    </div>
    <div class='form-group'>
        <label>{{__('Label.Subject')}}</label>
        <select class="form-control" name="subject_id">
        @foreach (\App\Models\Subject::all() as $subject)
            <option value="{{$subject->id}}"
            @if($subject->id == old('subject_id'))
             selected
            @endif
            >                                   
                {{$subject->name}}
            </option>
        @endforeach
        </select>
    </div>
    <div class="form-group text-right">
        <input type="submit" value="{{__('Label.Add')}}" class="btn btn-primary">
    </div>
</form>