@extends('layouts.app')

@section('title', 'Новости')

@section('content')
    <div class="ui segment">
        @php ($i = 0)
        @while ( $i++ < 15)
            <div class="ui fluid link card">
                <div class="content">
                    <div class="header">Cute Dog</div>
                    <div class="meta">
                    <span>Администратор</span>
                    </div>
                    <div class="description">  
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque rem minima, nesciunt reiciendis eius laudantium aspernatur fugit totam hic iure deleniti amet eaque alias ipsa porro aliquam animi? Illo, deserunt.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur veritatis ullam facilis, inventore voluptatem, sit eius vitae harum, similique fugiat amet dignissimos dolores ea iusto tempora quidem? Impedit, magnam excepturi.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis odit similique deserunt, laudantium iure nisi fuga autem porro architecto sit vel, pariatur soluta ducimus consequatur dicta ea et perspiciatis maiores.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae aperiam alias, recusandae natus consectetur eveniet fugiat nam error cumque eos dolorem quasi quam? Ad ullam, laudantium vel veritatis ipsum suscipit!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias a amet iure sequi modi repudiandae porro voluptate facilis praesentium voluptates accusamus ducimus, ex ipsa libero saepe veritatis impedit hic rem.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur amet nihil aliquid dolores numquam delectus, expedita illum at ex recusandae natus. Excepturi blanditiis reiciendis natus. Fuga voluptates assumenda adipisci error!
                    </div>
                </div>
                <div class="extra content">
                    Дата публикации: 15.06.2018
                </div>
            </div>
        @endwhile
    </div>
@endsection
