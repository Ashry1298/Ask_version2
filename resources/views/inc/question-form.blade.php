
<form action="{{route('questions.store')}}" method="POST">
    @csrf
    <div class="form-floating">
        <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Question ? </label>
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" name="anon" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Anonymous</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
