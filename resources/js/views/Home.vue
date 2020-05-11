<template>
    <div>
        <div class="flex bg-white max-w-screen-xl mx-auto" style="height:600px;">
            <div class="flex items-center lg:text-left lg:w-1/2 md:px-8 px-8 text-center">
                <div>
                    <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">Företag nära dig</h2>
                    <p class="mt-2 text-sm text-gray-700 md:text-base">
                        Local Ads är en site där alla företag kan sprida information till privatpersoner och andra företag i sin närhet. <br>
                        Det kan innehålla nya öppettider, Corona-hantering, Sommarjobbsansökningar, Lunchmeny och allt därtill.
                        <br/><br>
                        Välj din ort och ta del av informationen.
                    </p>

                    <div class="py-8 flex">
                        <div class="flex flex-1 justify-center m-auto py-8">

                        </div>
                        <div class="border-l-2 flex-1 grid justify-center p-4 py-8">
                            <ChosenCity/>
                        </div>
                    </div>
                </div>
            </div>
            <div
                    class="hidden lg:block lg:w-1/2"
                    style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)"
            >
                <div
                        class="h-full object-cover"
                        style="background-image: url(/img/hero-people-sunset.jpg);background-position: center;
    background-size: cover;"
                >
                    <div class="h-full bg-black opacity-25"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ChosenCity from "../components/ChosenCity.vue";

    export default {
        name: "Home",
        components: {
            ChosenCity
        }
    };
</script>
