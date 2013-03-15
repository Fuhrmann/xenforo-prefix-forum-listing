# [Prefix Forum Listing](http://xenforo.com/community/resources/thread-prefix-listing.80) - Shows a list of prefixes in each forum

This is an addon for the forum software [XenForo](http://www.xenforo.com).

<b>What it does:</b> Shows a list of prefixes in each forum that has prefixes.

Go to AdminCP -> Options -> Prefix Forum Listing to set some options to customize the output!

## 1.2.1
Fixes:
- Margin bottom was not being applied with custom prefix class
- Phrases that was hardcoded are now part of the addon phrases

## 1.2.0

This is the 6º version of this addon. Released in 14/03/2013.

Fixes:
- "ErrorException: Array to string conversion" (PHP 5.4)
- Fixed: In admin, when setting 1 to "Do not show prefixes with less then X threads" all prefixes in thread are displayed (no filter)
- Other bug fixes

New:
- an option "Select all" in the options when choosing the forums to show the prefix listing (admin template "option_list_option_multiple")
- you can select only the parent category of a forum that all subforums will show the prefixes. If you choose to show prefixes in the "Travel" category, actually all the subforums will show the prefixes list

## 1.1.0 Build 2

This is the 5º version of this addon. Released in 16/02/2012.

The current version is: 1.1.0 build 2


Fixes:
- Global RSS feed was not working when the addon was actived.
- Total counts was being displayed wrong.
- Cache problems.


## 1.1.0

This is the 4º version of this addon. Released in 08/02/2012.

Fixes:
- "Unfortunately, it is not possible to display Prefixes which do not have 1 thread. Would be great to also show Prefixes with zero threads." (http://xenforo.com/community/threads/pfps-com-br-thread-prefix-listing.22091/page-2#post-297441)
- Question when I update it doesn't show a version number change in the Add-ons list. Is this normal? How do I know I'm using the newest version with this add-on? (http://xenforo.com/community/threads/thread-prefix-
- The sort per diplay order is reversed, from big to low, is it possible to switch it in the correct way? (http://xenforo.com/community/threads/thread-prefix-listing.26811/#post-324081)listing.26811/#post-322608)
[b]Resolved UI[/b] - Too many prefixes it will go to multiple lines and there are some overlapping. (http://xenforo.com/community/threads/thread-prefix-listing.26811/#post-322591)
- Sorting prefixes by title was sorting in a wrong way. This is now fixed.
- Fixed some issues with performance when loading the prefixes.


New:
- Added an option to choose the margin bottom of the prefixes. This is related with the above resolved UI.
- Added an option to choose the order direction (ASC, DESC).
- Minimum of Threads Count - Choose here the minimum of thread count of each prefix that can be show in the prefix list. If you set this value to 0, for example, all prefixes even with 0 threads will show the count in the right side of it. If you set to 1, only prefixes that have thread count greater then 1 will show the thread count. This will only hide the thread count, not the prefix.
- Show Total Threads Count - Check this option if you want to show the total count of threads of each prefix.
- Added a new option to set the text to show right before the prefix list. You can let the field in blank to not show the text.
- Ammount of Prefixes - Set the ammount of prefixes to show. With this option you can limit the ammount of prefixes by what you want. If you set this option to 5, only 5 prefixes will me shown in the list. Set 0 to unlimited prefixes.
- Cache the ammount of threads of each prefix. Everytime a new threads with prefix X is created only the cache of that prefix is rebuilt. This helps to do less queries when listing the prefixes.



## 1.0.0 build 2

- Choose the forums to show the prefix list.
- Choose the minimum ammout of threads to show a prefix.
- Choose the display order of the prefix list (by title, by ammount of threads and by display order)
- Prefixes only show if:
a) has some threads with it
b) usergroup of the user can use the prefix



## 1.0.0 build 1

Released in 25/10/2011

- Released
