<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($jobs as $job)
        <a href="/jobs/{{$job['id']}}" class="border border-grey-200 px-4 block py-6 rounded-lg">
            <div class="text-sm font-bold text-blue-500">
                {{$job->employer->name}}
            </div>
            <div>
                <strong class="text-laracast">{{$job['title']}}:</strong> pays {{$job['salary']}} per year.
            </div>
        </a>
        @endforeach
        <div>
            {{$jobs->links()}}
        </div>
    </div>
</x-layout>