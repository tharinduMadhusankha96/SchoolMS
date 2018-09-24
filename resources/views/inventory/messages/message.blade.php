<style>
    .tex{
        font-size: large;
        font-weight: 500;
        font-family: "Comic Sans MS";

        color: black;
    }
</style>
<strong>
@if(count($errors)>0)
    @foreach($error->all() as $error)
        <div class="alert alert-dismissable alert-danger tex">
            {{$error}}
        </div>
        @endforeach
        @endif

@if(session('success'))
    <div class="alert alert-dismissable alert-success tex">
        {{session('success')}}
    </div>
    @endif

        @if(session('error'))
            <div class="alert alert-dismissable alert-danger tex">
                {{session('error')}}
            </div>
        @endif
</strong>

