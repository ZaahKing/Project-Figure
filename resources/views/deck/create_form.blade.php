<form id="setForm" action="{{route('deck.store')}}"  method="POST">   
    @csrf            
    <div class='form-group'>
        <label>{{__('Label.Title')}}</label>
        <input name='name' class="form-control" type="text" placeholder="{{__('Label.Title')}}" value="{{old('name')}}">
    </div>
    <div class='form-group'>
        <label>{{__('Label.Subject')}}</label>
        <select class="form-control" name="subject_id">
        @php
            $selectedId = old('subject_id');
        @endphp
        @foreach (\App\Models\Subject::where('user_id', \Auth::id())->get() as $subject)
            <option value="{{$subject->id}}"
            @if($subject->id == $selectedId)
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