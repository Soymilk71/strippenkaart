<template>
  <form action="/buy" method="POST" class="space-y-6">
    <input type="hidden" name="_token" :value="csrf">

    <!-- Klant & Soort -->
    <div class="flex flex-col md:flex-row md:items-center md:gap-6">
      <div class="flex-1">
        <label for="customer" class="block mb-1 font-medium">Klant</label>
        <select name="customer" id="customer" class="form-input w-full" v-model="form.customer">
          <option disabled value="">Selecteer een klant</option>
          <option v-for="klant in klanten" :value="klant.id" :key="klant.id">
            {{ klant.voornaam }} {{ klant.achternaam }}
          </option>
        </select>
      </div>

      <div class="flex-1 mt-4 md:mt-0">
        <label for="type" class="block mb-1 font-medium">Soort</label>
        <select name="type" id="type" class="form-input w-full" v-model="form.type">
          <option value="kopen">Uren kopen</option>
          <option value="spenderen">Uren spenderen</option>
        </select>
      </div>
    </div>

    <!-- Datum -->
    <div>
      <label for="date" class="block mb-1 font-medium">Datum</label>
      <input type="date" name="date" id="date" class="form-input w-full" v-model="form.date">
    </div>

    <!-- Uren & Minuten -->
    <div class="flex flex-col md:flex-row md:items-end md:gap-6">
      <div class="flex-1">
        <label for="hours" class="block mb-1 font-medium">Aantal gekochte uren</label>
        <input type="number" name="hours" id="hours" class="form-input w-full" placeholder="Uren" v-model="form.hours">
      </div>
      <div class="flex-1 mt-4 md:mt-0">
        <label for="minutes" class="block mb-1 font-medium">Minuten</label>
        <select name="minutes" id="minutes" class="form-input w-full" v-model="form.minutes">
          <option value="0">0</option>
          <option value="15">15</option>
          <option value="30">30</option>
          <option value="45">45</option>
        </select>
      </div>
    </div>

    <!-- Extra velden bij spenderen -->
    <div v-if="form.type === 'spenderen'">
      <div>
        <label for="title" class="block mb-1 font-medium">Titel</label>
        <input type="text" name="title" id="title" class="form-input w-full" placeholder="Titel" v-model="form.title">
      </div>

      <div>
        <label for="description" class="block mb-1 font-medium">Omschrijving</label>
        <textarea name="description" id="description" class="form-input w-full" rows="4" placeholder="Omschrijving" v-model="form.description"></textarea>
      </div>

      <div>
        <label for="jira" class="block mb-1 font-medium">Jira-link</label>
        <input type="text" name="jira" id="jira" class="form-input w-full" placeholder="Jira-link" v-model="form.jira">
      </div>
    </div>

    <div class="flex justify-start">
      <button type="submit" class="button-primary">Submit</button>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      klanten: [],
      form: {
        customer: '',
        type: 'kopen',
        date: '',
        hours: '',
        minutes: '0',
        title: '',
        description: '',
        jira: '',
      }
    };
  },
  mounted() {
    const oldDataEl = document.getElementById('old-data');
    if (oldDataEl) {
      const old = JSON.parse(oldDataEl.textContent);
      this.form = { ...this.form, ...old };
    }

    const klantenDataEl = document.getElementById('klanten-data');
    if (klantenDataEl) {
      this.klanten = JSON.parse(klantenDataEl.textContent);
    }
  }
};
</script>
