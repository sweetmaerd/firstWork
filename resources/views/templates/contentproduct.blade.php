<table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Img</th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Categories</th>
                                    <th>Author</th>
                                    <th>URL</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $v)
                                        <tr>
                                            <th>
                                                <?php $image = $v->img ? ('s_'.$v->img):'user.png' ?>
                                                <img src="{{ asset('/public/media/uploads/'.$image) }}" class="img-circle" width="100" height="100" >
                                            </th>
                                            <th>{{ $v->id }}</th>
                                            <th>{{ $v->title }}</th>
                                            <th>{{ $v->description }}</th>
                                            @if(isset($v->category->description))
                                            <th>{{ $v->category->description }}</th>
                                            @endif
                                            <th>{{ $v->author }}</th>
                                            <th>{{ $v->url }}</th>
                                            <th>{{ $v->date }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
<div align='center'>{{$all->render()}}</div>