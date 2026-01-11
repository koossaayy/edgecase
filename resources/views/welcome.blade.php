<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->

</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    {{-- Users --}}
    {{ __('Hello :name', ['name' => $user->name]) }}
    {{ __('Welcome back, :name!', ['name' => $user->name]) }}
    {{ __('Goodbye :name, see you soon.', ['name' => $user->name]) }}

    {{-- Posts --}}
    {{ __('Your post ":title" was viewed :count times.', ['title' => $post->title, 'count' => $views]) }}
    {{ __('Post ":title" has no views yet.', ['title' => $post->title]) }}
    {{ __('Post ":title" was deleted by :user.', ['title' => $post->title, 'user' => $admin->name]) }}

    {{-- Comments --}}
    {{ __(':count comments on this post.', ['count' => $commentsCount]) }}
    {{ __('Comment by :author at :time.', ['author' => $comment->author, 'time' => $comment->created_at]) }}
    {{ __('Your comment was reported by :count users.', ['count' => $reports]) }}

    {{-- Auth --}}
    {{ __('Invalid credentials for :email.', ['email' => $email]) }}
    {{ __('Password for :email was reset successfully.', ['email' => $email]) }}
    {{ __('Account :email is not verified.', ['email' => $email]) }}

    {{-- Notifications --}}
    {{ __('You have :count new notifications.', ['count' => $notifications]) }}
    {{ __(':user mentioned you in ":title".', ['user' => $user->name, 'title' => $post->title]) }}
    {{ __('Reminder: :event at :time.', ['event' => $event, 'time' => $time]) }}

    {{-- Dates & Time --}}
    {{ __('Today is :date.', ['date' => now()->toDateString()]) }}
    {{ __('Last login was :time ago.', ['time' => $lastLogin]) }}
    {{ __('Expires on :date.', ['date' => $expiresAt]) }}

    {{-- Files --}}
    {{ __('File ":file" uploaded successfully.', ['file' => $filename]) }}
    {{ __('File ":file" exceeds the limit of :size MB.', ['file' => $filename, 'size' => $maxSize]) }}
    {{ __(':count files were deleted.', ['count' => $deletedFiles]) }}

    {{-- Payments --}}
    {{ __('Payment of :amount :currency was successful.', ['amount' => $amount, 'currency' => $currency]) }}
    {{ __('Invoice #:number is overdue by :days days.', ['number' => $invoiceNumber, 'days' => $days]) }}
    {{ __('Subscription ends on :date.', ['date' => $endDate]) }}

    {{-- Errors --}}
    {{ __('An error occurred: :message.', ['message' => $errorMessage]) }}
    {{ __('Access denied for role :role.', ['role' => $role]) }}
    {{ __('Resource :resource not found.', ['resource' => $resource]) }}

    {{-- Misc --}}
    {{ __('Showing :from to :to of :total results.', ['from' => $from, 'to' => $to, 'total' => $total]) }}
    {{ __('Step :current of :total.', ['current' => $step, 'total' => $steps]) }}
    {{ __('Version :version released on :date.', ['version' => $version, 'date' => $releaseDate]) }}

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
