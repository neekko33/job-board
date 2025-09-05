<div {{$attributes}}>
    <div class="flex items-center">
        <input type="radio" name="{{$name}}" id="all" class="mr-1"
               value="" @checked(!request($name))/>
        <label for="all">All</label>
    </div>
    @foreach($optionsWithLabels as $label => $option)
        <div class="flex items-center">
            <input type="radio" name="experience" id="{{$option}}" class="mr-1"
                   value="{{$option}}" @checked(request($name) === $option)/>
            <label for="{{$option}}">{{$label}}</label>
        </div>
    @endforeach
</div>
