<h2>
    {{$job->title}}
</h2>
<p>
    Congrates! your job is now live on our website
</p>
<p>
    <a href="{{url('/jobs/' . $job->id)}}">View your job listing</a>
</p>