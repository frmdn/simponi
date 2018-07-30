<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <select class="form-control" name="bu" style="width:95%">
      @foreach ($blogs as $blog)
        <option value={{ $blog->title }}>{{ $blog->title }}</option>
        {{-- <li> {{ $blog->title }} </li> --}}
      @endforeach
      {{-- <option value="cheese">Cheese</option>
      <option value="tomatoes">Tomatoes</option>
      <option value="mozarella">Mozzarella</option>
      <option value="mushrooms">Mushrooms</option>
      <option value="pepperoni">Pepperoni</option>
      <option value="onions">Onions</option> --}}
    </select>
    {{-- @foreach ($users as $user)
      <li> {{ $user->username }} </li>
    @endforeach --}}
  </body>
</html>
