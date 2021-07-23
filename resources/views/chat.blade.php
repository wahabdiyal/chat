 
@extends('layouts.app')

@section('content')
<div class=" bg-gray-100 py-6 flex flex-col float-right justify-start sm:py-12">
  <div class="relative py-3 sm:max-w-xl sm:mx-auto">
    <div style="background: cadetblue;" class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-light-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
      <div class="max-w-md mx-auto">
        <div>
         <div class="flex items-center justify-end">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                    </path>
                                </svg>
                            </div>
        </div>
        <div class="divide-y divide-gray-200">
             <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
            <p>Want to dig deeper into Tailwind?</p>
            <p>
              <a href="https://tailwindcss.com/docs" class="text-cyan-600 hover:text-cyan-700"> Read the docs &rarr; </a>
            </p>
          </div>
          <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
         
                
                     
                    <div class="relative ">
                        <textarea type="message" id="message" name="message" placeholder="message"
                            class="w-full px-4 py-2 mb-4 text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg mr-4text-base focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"></textarea>
                    </div>
                    
                    <div class="relative">
                    <button  id="comment" style="width: 80px;" class="px-2 py-2 font-semibold text-white transition duration-500 ease-in-out transform bg-black rounded-lg hover:bg-gray-800 hover:to-black focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">Button</button>
                 
            </div>  
          </div>
         
        </div>
      </div>
    </div>
  </div>
</div>

   
                  
   <!-- <section class="text-gray-700 body-font">
            <div class="container px-8 pt-24 pb-24 mx-auto lg:px-4">
                <div
                    class="flex flex-col w-full p-8 mx-auto mt-10 border rounded-lg lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">
                    <div class="flex flex-wrap -m-2">
                        <div class="w-1/2 p-2">
                            <div class="relative">
                                <input type="text" id="name" name="name" placeholder="name"
                                    class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            </div>
                        </div>
                        <div class="w-1/2 p-2">
                            <div class="relative">
                                <input type="name" id="name" name="name" placeholder="name"
                                    class="w-full px-4 py-2 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <input type="email" id="email" name="email" placeholder="email"
                                class="w-full px-4 py-2 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full p-2">
                            <input type="password" id="password" name="password" placeholder="password"
                                class="w-full px-4 py-2 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full p-2">
                            <input type="password" id="password" name="password" placeholder=" password"
                                class="w-full px-4 py-2 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="flex p-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded form-checkbox">
                                <span class="ml-2">Subscribe me </span>
                            </label>
                        </div>
                        <div class="w-full p-2">
                            <input type="password" id="password" name="password" placeholder="password"
                                class="w-full px-4 py-2 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full p-2 ">
                            <button
                                class="w-full px-8 py-2 font-semibold text-white transition duration-500 ease-in-out transform bg-black rounded-lg hover:bg-gray-800 hover:to-black focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">Button</button>
                                <p class="mx-auto mt-3 text-xs text-center text-gray-500">WickedTemplates rocks, and you know it.</p>
                        </div>
                    </div>
                </div>
        </section> -->
@endsection