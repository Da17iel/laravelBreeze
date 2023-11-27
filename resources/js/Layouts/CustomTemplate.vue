<script setup>
import NavBar from "@/Shared/NavBar.vue";

defineProps({
    'auth': Object,
})

</script>

<template>
    <Head>
        <!-- This meta Tag will now be inherited by every item that uses it. -->
        <!-- Head-key prevents duplication if children try to create meta tag -->
        <meta name="description" content="Website that serves as a tseting ground" head-key="description">
    </Head>

    <header class="p-7 w-full bg-amber-400">
        <h1 class="font-bold text-center text-3xl">My Website</h1>
        <div class="flex justify-between">
            <NavBar/>
            <p>Welcome back {{ auth.user.name }}!!</p>
        </div>

    </header>
    <main class="m-7 m-10 min-h-[65vh]">
        <slot/>
    </main>
    <footer class="p-7 w-full bg-gray-500 flex flex-row justify-between">
        <div>
            <p>Website's Footer</p>
            <p>© Copyright Daniel Greil</p>
        </div>
        <div>
            <iframe width="500" height="100" scrolling="no" frameborder="no" allow="autoplay"
                    src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1311993046&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
            <div
                style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;">
                <a href="https://soundcloud.com/urbans-musical" title="Urbans Music" target="_blank"
                   style="color: #cccccc; text-decoration: none;">Urbans Music</a> · <a
                href="https://soundcloud.com/urbans-musical/rauw-alejandro-ft-lyanno-brray-lokera"
                title="Rauw Alejandro Ft Lyanno, Brray - Lokera" target="_blank"
                style="color: #cccccc; text-decoration: none;">Rauw Alejandro Ft Lyanno, Brray - Lokera</a></div>
        </div>
    </footer>
</template>

<style scoped>

</style>
