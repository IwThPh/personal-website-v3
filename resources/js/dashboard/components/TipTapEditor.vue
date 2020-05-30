<template>
  <div class="editor border rounded p-1">
    <editor-menu-bar :editor="editor" v-slot="{ commands, isActive}">
      <div class="d-flex flex-wrap mb-1">
        <div class="mx-1">
          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.bold() }"
            @click="commands.bold"
          >
            <i class="fas fa-bold"></i>
          </button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.italic() }"
            @click="commands.italic"
          >
            <i class="fas fa-italic"></i>
          </button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.strike() }"
            @click="commands.strike"
          >
            <i class="fas fa-strikethrough"></i>
          </button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.underline() }"
            @click="commands.underline"
          >
            <i class="fas fa-underline"></i>
          </button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.code() }"
            @click="commands.code"
          >
            <i class="fas fa-code"></i>
          </button>
        </div>

        <div class="mx-1">
          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.paragraph() }"
            @click="commands.paragraph"
          >
            <i class="fas fa-paragraph"></i>
          </button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.heading({ level: 1 }) }"
            @click="commands.heading({ level: 1 })"
          >H1</button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.heading({ level: 2 }) }"
            @click="commands.heading({ level: 2 })"
          >H2</button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.heading({ level: 3 }) }"
            @click="commands.heading({ level: 3 })"
          >H3</button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.heading({ level: 4 }) }"
            @click="commands.heading({ level: 4 })"
          >H4</button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.heading({ level: 5 }) }"
            @click="commands.heading({ level: 5 })"
          >H5</button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.heading({ level: 6 }) }"
            @click="commands.heading({ level: 6 })"
          >H6</button>
        </div>

        <div class="mx-1">
          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.bullet_list() }"
            @click="commands.bullet_list"
          >
            <i class="fas fa-list"></i>
          </button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.ordered_list() }"
            @click="commands.ordered_list"
          >
            <i class="fas fa-list-ol"></i>
          </button>

          <button
            class="btn btn-outline-dark btn-sm"
            :class="{ 'is-active': isActive.blockquote() }"
            @click="commands.blockquote"
          >
            <i class="fas fa-quote-right"></i>
          </button>

          <button class="btn btn-outline-dark btn-sm" @click="commands.horizontal_rule">hr</button>
        </div>

        <div class="mx-1">
          <button class="btn btn-outline-dark btn-sm" @click="commands.undo">
            <i class="fas fa-undo"></i>
          </button>

          <button class="btn btn-outline-dark btn-sm" @click="commands.redo">
            <i class="fas fa-redo"></i>
          </button>
        </div>
      </div>
    </editor-menu-bar>

    <editor-content class="editor-cont" :editor="editor" />
  </div>
</template>

<script>
import { Editor, EditorContent, EditorMenuBar } from "tiptap";
import {
  Blockquote,
  CodeBlock,
  HardBreak,
  Heading,
  HorizontalRule,
  OrderedList,
  BulletList,
  ListItem,
  TodoItem,
  TodoList,
  Bold,
  Code,
  Italic,
  Link,
  Strike,
  Underline,
  History
} from "tiptap-extensions";
export default {
  components: {
    EditorContent,
    EditorMenuBar
  },
  props: ["data"],
  data() {
    return {
      editor: new Editor({
        content: this.data,
        extensions: [
          new Blockquote(),
          new BulletList(),
          new CodeBlock(),
          new HardBreak(),
          new Heading({ levels: [1, 2, 3, 4, 5, 6] }),
          new HorizontalRule(),
          new ListItem(),
          new OrderedList(),
          new TodoItem(),
          new TodoList(),
          new Link(),
          new Bold(),
          new Code(),
          new Italic(),
          new Strike(),
          new Underline(),
          new History()
        ],
        onUpdate: ({ getHTML }) => {
          this.$emit("update:data", getHTML());
        }
      })
    };
  },
  created() {
    this.setContent(this.data);
  },
  beforeDestroy() {
    this.editor.destroy();
  },
  methods: {
    setContent(data) {
      console.log("data", data);

      this.editor.setContent(data, true);
    }
  }
};
</script>

<style lang="scss" scoped>
@import "~@/_variables.scss";
@import "~bootstrap/scss/bootstrap";

.menubar {
  margin-bottom: 0.5rem;
}

.editor {
  &__content {
    overflow-wrap: break-word;
    word-wrap: break-word;
    word-break: break-word;

    * {
      caret-color: currentColor;
    }

    pre {
      padding: 0.7rem 1rem;
      border-radius: 5px;
      font-size: 0.8rem;
      overflow-x: auto;

      code {
        display: block;
      }
    }

    p code {
      padding: 0.2rem 0.4rem;
      border-radius: 5px;
      font-size: 0.8rem;
      font-weight: bold;
    }

    ul,
    ol {
      padding-left: 1rem;
    }

    li > p,
    li > ol,
    li > ul {
      margin: 0;
    }

    a {
      color: inherit;
    }

    blockquote {
      padding-left: 0.8rem;
      font-style: italic;

      p {
        margin: 0;
      }
    }

    img {
      max-width: 100%;
      border-radius: 3px;
    }
    .resize-cursor {
      cursor: ew-resize;
      cursor: col-resize;
    }
  }
}
</style>
